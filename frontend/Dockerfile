FROM alpine:3.16

RUN mkdir -p /var/www/frontend

WORKDIR /var/www/frontend

RUN apk add --no-cache npm

COPY . .

RUN npm install \
    && cp ./node_modules/react/umd/react.development.js ./public/react.development.js \
    && cp ./node_modules/react-dom/umd/react-dom.development.js ./public/react-dom.development.js

CMD ["npm", "run", "development"]
