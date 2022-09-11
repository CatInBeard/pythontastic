FROM nginx:1.23.1-alpine

RUN apk add --no-cache php

WORKDIR /var/www/html

COPY --chown=www-data:www-data . .

CMD ["nginx", "-g", "daemon off;"]