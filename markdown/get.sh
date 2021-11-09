#!/bin/bash

if [ ! -f composer.json ]; then
    echo "Please make sure to run this script from the root directory of this repo."
    exit 1
fi

DOCUMENTATION_VERSIONS=(
  v0.1
  # TODO : Remove "Laravel" once a version of documentation is ready.
  laravel
)

for v in "${DOCUMENTATION_VERSIONS[@]}"; do
    if [ -d "markdown/$v" ]; then
        echo "Pulling latest documentation for version $v"
        (cd markdown/$v && git pull)
    else
        echo "Cloning version $v"
        # TODO : Remove if else once a version of documentation is ready.
        if [ "$v" == "laravel" ]; then
            git clone --single-branch --branch 8.x --no-tags https://github.com/laravel/docs.git "markdown/$v"
        else
            git clone --single-branch --branch "$v" --no-tags https://github.com/sharanvelu/dockr-documentation.git "markdown/$v"
        fi
    fi
done
