#!/bin/bash  
##probably have the image path wrong??
#dos2unix might make it work 
#cd /home/ec2-user/github/image-quality-assessment/ && source contrib/tf_serving/venv_tfs_nima/bin/activate && python -W ignore -m contrib.tf_serving.tfs_sample_client --image-path /var/www/html/SoftwareDev/$1 --model-name mobilenet_aesthetic

## THIS WORKS
cd /home/photoapp/github/image-quality-assessment/ && source contrib/tf_serving/venv_tfs_nima/bin/activate && python -W ignore -m contrib.tf_serving.tfs_sample_client --image-path=/var/www/html/SoftwareDev/$1 --model-name=mobilenet_aesthetic

##returning 0 (not in terminal) when ending in SoftwareDev/exactimage.JPG ...
#shell exec fnc isn't being called correctly

