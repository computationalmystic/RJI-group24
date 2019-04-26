#!/bin/bash  

## Specific photo needs to be changed back to $NAME or some other parameter probably passed from the web at some point.
cd /home/ec2-user/github/image-quality-assessment/ && source contrib/tf_serving/venv_tfs_nima/bin/activate && python -W ignore -m contrib.tf_serving.tfs_sample_client --image-path /home/ec2-user/photo/rji.augurlabs.io/Other_stuff/20170123_HickmanBB_EA/20170123__HickmanBB_EA_015.JPG --model-name mobilenet_aesthetic
