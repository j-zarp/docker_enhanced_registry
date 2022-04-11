# Docker Registry

A local docker registry with a minimal web interface.

### How to see available images
Navigate to https://registry-web.<your_website_url> <br>
Click on an image to see the corresponding image tags.

### How to push an image
To push a new image on the local registry
  1. login if necessary <br>
    `docker login registry.<your_website_url>`
  2. find the image hash <br>
    `docker image ls | grep <my_image>`
  3. tag the image <br>
   `docker tag <my_image_hash> registry.<your_website_url>/<my_image>:<version_tag>`
  4. push the image <br>
   `docker push registry.<your_website_url>/<my_image>:<version_tag>`
  5. Done!

The version tag is optional. If not specified, the default "latest" tag is used.

### How to pull an image
`docker login registry.<your_website_url>` <br>
`docker pull registry.<your_website_url>/<my_image>:<version_tag>`

### How to remove a tag
`docker rmi registry.<your_website_url>/<my_image>:<version_tag>`


