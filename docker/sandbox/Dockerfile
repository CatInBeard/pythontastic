FROM docker:20.10.17-dind

WORKDIR /usr/src/app

RUN apk add openssh bash

RUN ssh-keygen -A

RUN echo "PermitRootLogin yes" >> /etc/ssh/sshd_config;

RUN echo "root:123" | chpasswd

RUN mkdir /app

EXPOSE 22

COPY ./entrypoint.sh /bin

ENTRYPOINT ["entrypoint.sh"]
