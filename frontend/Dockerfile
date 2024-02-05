FROM alpine:3.16

WORKDIR /app

RUN apk add --no-cache npm

COPY . .

RUN npm install

CMD ["npm", "run", "development"]
