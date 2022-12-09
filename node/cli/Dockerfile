FROM node:alpine
WORKDIR /var/www
COPY package*.json ./
RUN npm install
COPY index.js ./
EXPOSE 3000
CMD ["npm", "start"]