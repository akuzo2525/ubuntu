# node.js

git clone https://github.com/creationix/nvm.git ~/.nvm
source ~/.nvm/nvm.sh

nvm ls-remote
nvm install 6.5.0
node -v

nvm alias default v6.5.0

vi ~/.bash_profile
if [[ -s ~/.nvm/nvm.sh ]];
	then source ~/.nvm/nvm.sh
fi
