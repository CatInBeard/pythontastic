FROM nginx:1.23.1-alpine

RUN apk add --no-cache php

WORKDIR /var/www/html

COPY . .

CMD ["nginx", "-g", "daemon off;"]