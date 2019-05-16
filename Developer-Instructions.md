RJI project installation

AWS server config

1. Install Python3 on AWS server
1.1 Install depended enviroment
    yum -y install zlib-devel bzip2-devel openssl-devel ncurses-devel sqlite-devel readline-devel tk-devel gdbm-devel db4-devel libpcap-devel xz-devel
1.2 Download python3 source code package，then unzip it：
    wget https://www.python.org/ftp/python/3.6.1/Python-3.6.1.tgz
    tar -xvzf Python-3.6.1.tgz
1.3 install python3
    mkdir -p /usr/local/python3
    cd Python-3.6.1
    ./configure --prefix=/usr/local/python3
    make
    make install
1.4 Establishing soft link
    ln -s /usr/local/python3/bin/python3 /usr/bin/python3
    add /usr/local/python3/bin to PATH
    vim ~/.bash_profile
    # .bash_profile
    # Get the aliases and functions
    if [ -f ~/.bashrc ]; then
    . ~/.bashrc
    fi
    # User specific environment and startup programs
    PATH=$PATH:$HOME/bin:/usr/local/python3/bin
    export PATH
  make configration effective：
    source ~/.bash_profile
    
2. Install docker on AWS server
  follow the steps here:
  https://docs.docker.com/install/linux/docker-ce/centos/
  
3. Clone algorithm to server
3.1 clone algorithm to local machine then upload the algorithm to AWS server(If you have installed git on AWS server,you can download the algorithm directly from github)
    git clone https://github.com/idealo/image-quality-assessment
3.2 upload algorithm to AWS server us winSCP tool

4. Serving NIMA with TensorFlow Serving
   Follow the steps in the link:
   https://github.com/idealo/image-quality-assessment
   Just follow the Serving NIMA with TensorFlow Serving steps
   
5. Install JDK
5.1 download jdk1.8，unzip jdk to path：/usr/java/jdk
  tar -xvf jdk-8u131-linux-x64.tar.gz -C /usr/java/jdk
5.2 config environment path for jdk:
  vi /etc/profile
  add environment path to this file and save:
  #set java enviroment
  export JAVA_HOME=/usr/java/jdk/jdk1.8.0_131
  export JRE_HOME=/usr/java/jdk/jdk1.8.0_131/jre
  export CLASSPATH=.:$JAVA_HOME/lib$:JRE_HOME/lib:$CLASSPATH
  export PATH=$JAVA_HOME/bin:$JRE_HOME/bin/$JAVA_HOME:$PATH
  source /etc/profile
5.3check jdk config ok:
  java -version
  
