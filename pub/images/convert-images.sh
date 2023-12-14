#!/bin/bash
find . -type f -name \*.png | while read IMAGE; do convert ${IMAGE} ${IMAGE/.png/.avif}; done
find . -type f -name \*.png | while read IMAGE; do convert ${IMAGE} ${IMAGE/.png/.webp}; done
