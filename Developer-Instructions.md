RJI project install and deploy.

AWS server config

  1.Install python3 on AWS server
  
    1.1 Install depended enviroment
        yum -y install zlib-devel bzip2-devel openssl-devel ncurses-devel sqlite-devel readline-devel tk-devel gdbm-devel db4-devel libpcap-devel xz-devel
    1.2 Download python3 source code package，then unzip it：
        wget https://www.python.org/ftp/python/3.6.1/Python-3.6.1.tgz
        tar -xvzf Python-3.6.1.tgz
    1.2 install python3
        mkdir -p /usr/local/python3
        cd Python-3.6.1
        ./configure --prefix=/usr/local/python3
        make
        make install
    1.3 Establishing soft link
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
  2.Install docker on AWS server
  
      follow the steps in the link
      https://docs.docker.com/install/linux/docker-ce/centos/
  3.Clone algorithm to server
  
      3.1 clone algorithm to local machine then upload the algorithm to AWS server(If you have installed git on AWS server,you can download the algorithm directly from github)
        git clone https://github.com/idealo/image-quality-assessment
      3.2upload algorithm to AWS server us winSCP tool
  4.Serving NIMA with TensorFlow Serving
  
    Follow the steps in the link:
      https://github.com/idealo/image-quality-assessment
      Just follow the Serving NIMA with TensorFlow Serving steps

  5.Install JDK
  
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
  6.Install Tomcat Apache
  
    6.1 download Tomcat8 and unzip to :
      tar -xvf apache-tomcat-8.5.14.tar.gz -C /usr/java/tomcat/
    6.2 edit tomcat8 bin/setclasspath.sh file, add two lines for jdk config at the bottom of this file
       export JAVA_HOME=/usr/java/jdk/jdk1.8.0_131
       export JRE_HOME=/usr/java/jdk/jdk1.8.0_131/jre
  7.Database configuration
  
      7.1 download mysql 
      7.2 install mysql
        rpm -ivh MySQL-server-5.6.15-1.el6.x86_64.rpm
      7.3 start mysql
        service mysql start
  8.Webcode deploy
  
      8.1 download RJI webcode
        git clone https://github.com/AlDavis612/Group11SoftwareProject/tree/master/RJIWebCode
      8.2 upload webcode to AWS server
          (option) use winSCP tool to upload code to path: /usr/java/tomcat/webapps
          (option) use Filezilla to upload the code to path: /usr/java/tomcat/webapps
      8.3 create database and tables in mysql
          use databaseschema file:
          https://github.com/AlDavis612/Group11SoftwareProject/blob/master/DatabaseSchema/DatabaseCode.sql
      8.4 start tomcat
          ./startup.sh
