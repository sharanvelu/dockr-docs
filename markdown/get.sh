#!/bin/bash

if [ ! -f composer.json ]; then
    echo "Please make sure to run this script from the root directory of this repo."
    exit 1
fi

DOCUMENTATION_VERSIONS=(
  v1.1
  v1.2
)

for v in "${DOCUMENTATION_VERSIONS[@]}"; do
    if [ -d "markdown/$v" ]; then
        echo "Pulling latest documentation for version $v"
        (cd markdown/$v && git reset --hard && git pull)
    else
        echo "Cloning version $v"
        git clone --single-branch --branch "$v" --no-tags https://github.com/sharanvelu/dockr-documentation.git "markdown/$v"
    fi
done
