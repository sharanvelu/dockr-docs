#!/bin/bash

if [ ! -f composer.json ]; then
    echo "Please make sure to run this script from the root directory of this repo."
    exit 1
fi

DOCS_VERSIONS=(
  temp
)

for v in "${DOCS_VERSIONS[@]}"; do
    if [ -d "markdown/$v" ]; then
        echo "Pulling latest documentation for version $v"
        (cd markdown/$v && git pull)
    else
        echo "Cloning version $v"
        git clone --single-branch --branch "$v" --no-tags https://github.com/sharanvelu/dockr-documentation.git "markdown/$v"
    fi;
done

git clone --single-branch --branch 8.x --no-tags https://github.com/laravel/docs.git "markdown/laravel"
