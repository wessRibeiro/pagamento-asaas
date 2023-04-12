#Here we will use node as the base image.
FROM node:18.15-alpine

#create a working directory inside the container.
WORKDIR /app
COPY package*.json ./

RUN npm install

COPY ./ .

EXPOSE 3000

CMD [ "npm", "run", "serve"]


