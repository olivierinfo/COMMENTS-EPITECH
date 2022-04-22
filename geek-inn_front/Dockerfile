# syntax=docker/dockerfile:1
FROM node:latest
WORKDIR /app
COPY . /app
RUN npm install
EXPOSE 8080
CMD ["npm", "run", "dev"]