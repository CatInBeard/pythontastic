FROM redis:alpine3.16
COPY redis.conf /usr/local/etc/redis/redis.conf
RUN mkdir /var/lib/redis
CMD [ "docker-entrypoint.sh", "/usr/local/etc/redis/redis.conf"]