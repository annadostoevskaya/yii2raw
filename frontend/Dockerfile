FROM alpine:3.16

WORKDIR /var/www/frontend

RUN apk add --no-cache npm

COPY . .

RUN npm install

CMD ["npm", "run", "development"]
