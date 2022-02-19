#!/bin/bash

set -e

echo "Image Id from build spec : ${IMAGE_ID}"

IMG_VERSION="${CODEBUILD_RESOLVED_SOURCE_VERSION}"
IMAGE="${ECR_REPOSITORY_URL}:${IMG_VERSION}"

echo "AWS Log Group : ${AWS_LOG_GROUP}"
echo "Container Name : ${CONTAINER_NAME}"
echo "Task Role ARN : ${TASK_ROLE_ARN}"
echo "Image : ${IMAGE}"

IMAGE_PLACEHOLDER="<img>"
ENV_FILE_PLACEHOLDER="<env-file>"
CPU_PLACEHOLDER="\"<cpu>\""
MEMORY_PLACEHOLDER="\"<memory>\""
MEMORY_RES_PLACEHOLDER="\"<memory-reservation>\""
CONTAINER_NAME_PLACEHOLDER="<container-name>"
AWS_LOG_GROUP_PLACEHOLDER="<aws-log-group>"


CONTAINER_DEFINITION_FILE=$(cat docker-deployment/container-definition.json)

CONTAINER_DEFINITION="${CONTAINER_DEFINITION_FILE//${IMAGE_PLACEHOLDER}/${IMAGE}}"
CONTAINER_DEFINITION="${CONTAINER_DEFINITION//${AWS_LOG_GROUP_PLACEHOLDER}/${AWS_LOG_GROUP}}"
CONTAINER_DEFINITION="${CONTAINER_DEFINITION//${CONTAINER_NAME_PLACEHOLDER}/${CONTAINER_NAME}}"
CONTAINER_DEFINITION="${CONTAINER_DEFINITION//${ENV_FILE_PLACEHOLDER}/${ENV_FILE_S3}}"
CONTAINER_DEFINITION="${CONTAINER_DEFINITION//${CPU_PLACEHOLDER}/${CPU}}"
CONTAINER_DEFINITION="${CONTAINER_DEFINITION//${MEMORY_PLACEHOLDER}/${MEMORY}}"
CONTAINER_DEFINITION="${CONTAINER_DEFINITION//${MEMORY_RES_PLACEHOLDER}/${MEMORY_RES}}"

export TASK_VERSION=$(aws ecs register-task-definition --family ${TASK_DEFINITION} --container-definitions "${CONTAINER_DEFINITION}" --execution-role-arn ${TASK_ROLE_ARN} --task-role-arn ${TASK_ROLE_ARN} --network-mode bridge --requires-compatibilities EC2 --tags key="commit",value=$CODEBUILD_RESOLVED_SOURCE_VERSION | jq --raw-output '.taskDefinition.revision')
echo "Registered ECS Task Definition Version: ${TASK_VERSION}"


if [ -n "${TASK_VERSION}" ]; then
    echo "Update ECS Cluster: ${CLUSTER_NAME}"
    echo "Service: ${SERVICE_NAME}"
    echo "Task Definition: ${TASK_DEFINITION}:${TASK_VERSION}"

    DEPLOYED_SERVICE=$(aws ecs update-service --cluster $CLUSTER_NAME --service $SERVICE_NAME --task-definition ${TASK_DEFINITION}:${TASK_VERSION} --force-new-deployment | jq --raw-output '.service.serviceName')
    echo "Deployment of service \"${DEPLOYED_SERVICE}\" complete!"

else
    echo "exit: Unable to register new task definition or version."
    exit;
fi
