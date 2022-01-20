#!/bin/bash

set -e

TASK_FAMILY=$TASK_DEFINITION
SERVICE_NAME=$SERVICE_NAME
CLUSTER_NAME=$CLUSTER_NAME
CPUENV=$CPU
MEMORYENV=$MEMORY
IMG_VERSION=$IMAGE_ID
IMAGE=${AWS_REGISTRY_URL}:${IMG_VERSION}
ENVFILE=${ENVFILE_S3}


echo $AWS_LOG_GROUP
echo $CONTAINER_NAME
echo $TASK_ROLE_ARN

IMGAGE_PACEHOLDER="<IMG>"
ENVFILE_PACEHOLDER="<envfile>"
CPU_PACEHOLDER="<cpu>"
MEMORY_PACEHOLDER="<memory>"
CONTAINER_NAME_PACEHOLDER="<container-name>"
AWS_LOG_GROUP_PACEHOLDER="<aws-log-group>"


CONTAINER_DEFINITION_FILE=$(cat container-definition.json)
CONTAINER_DEFINITION="${CONTAINER_DEFINITION_FILE//$IMGAGE_PACEHOLDER/$IMAGE}"
CONTAINER_DEFINITION="${CONTAINER_DEFINITION//$AWS_LOG_GROUP_PACEHOLDER/$AWS_LOG_GROUP}"
CONTAINER_DEFINITION="${CONTAINER_DEFINITION//$CONTAINER_NAME_PACEHOLDER/$CONTAINER_NAME}"
CONTAINER_DEFINITION="${CONTAINER_DEFINITION//$ENVFILE_PACEHOLDER/$ENVFILE}"
CONTAINER_DEFINITION="${CONTAINER_DEFINITION//$CPU_PACEHOLDER/$CPUENV}"
CONTAINER_DEFINITION="${CONTAINER_DEFINITION//$MEMORY_PACEHOLDER/$MEMORYENV}"

#echo "Source Version: " $CODEBUILD_RESOLVED_SOURCE_VERSION
#echo "commit ID: " $(git rev-parse automated_deployment_in_ECS)
export TASK_VERSION=$(aws ecs register-task-definition --family ${TASK_FAMILY} --container-definitions "$CONTAINER_DEFINITION" --execution-role-arn $TASK_ROLE_ARN --task-role-arn $TASK_ROLE_ARN --network-mode bridge --requires-compatibilities EC2 --tags key="commit",value=$CODEBUILD_RESOLVED_SOURCE_VERSION | jq --raw-output '.taskDefinition.revision')
echo "Registered ECS Task Definition: " $TASK_VERSION


if [ -n "$TASK_VERSION" ]; then
    echo "Update ECS Cluster: " $CLUSTER_NAME
    echo "Service: " $SERVICE_NAME
    echo "Task Definition: " $TASK_FAMILY:$TASK_VERSION

    DEPLOYED_SERVICE=$(aws ecs update-service --cluster $CLUSTER_NAME --service $SERVICE_NAME --task-definition $TASK_FAMILY:$TASK_VERSION --force-new-deployment | jq --raw-output '.service.serviceName')
    echo "Deployment of $DEPLOYED_SERVICE complete!!"

else
    echo "exit: No task definition"
    exit;
fi