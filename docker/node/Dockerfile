# base image
FROM node:12.2.0

# set working directory
WORKDIR /app

# add `/app/node_modules/.bin` to $PATH
ENV PATH /app/node_modules/.bin:$PATH

# install and cache app dependencies

COPY package.json /app/package.json
RUN npm install
RUN npm install -g @angular/cli@9.0.2

# add app
COPY C:\Users\fujitsu\Desktop\Docker\dockerangular /app

# start app
CMD ng serve --host 0.0.0.0 --disable-host-check