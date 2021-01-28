FROM node:14 as node
FROM nginx:1.19-alpine

RUN \
    apk update \
    && apk add --update --no-cache --virtual=.build-dependencies \
        g++

COPY --from=node /usr/local/bin /usr/local/bin
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /opt /opt
