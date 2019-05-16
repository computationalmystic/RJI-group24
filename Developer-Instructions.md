RJI project installation

AWS server config

1. Install Python3 on AWS server
	 - yum -y install zlib-devel bzip2-devel openssl-devel ncurses-devel sqlite-devel readline-devel tk-devel gdbm-devel db4-devel libpcap-devel xz-devel
> 1.1 Install depended environment
	 
> 1.2 Download python3 source code package, then unzip it: 

> 1.3 Establishing a soft link

2. Install docker on AWS server
	 - follow the steps in the link
  https://docs.docker.com/install/linux/docker-ce/centos/

3. Clone algorithm to server
> 3.1 clone algorithm to local machine then upload the algorithm to AWS server(If you have installed git on AWS server, you can download the algorithm directly from github)
    git clone https://github.com/idealo/image-quality-assessment
		
> 3.2 upload alogrithm to AWS server us winSCP tool 

4. Serving NIMA with TensorFlow Serving
	 - Follow the steps in the link:
  https://github.com/idealo/image-quality-assessment
  Just follow the Serving NIMA with TensorFlow Serving steps

5. Install JDK 
> 5.1 download jdk1.8，unzip jdk to path：/usr/java/jdk
	tar -xvf jdk-8u131-linux-x64.tar.gz -C /usr/java/jdk
	
> 5.2 config environment path for jdk:

  
