FROM nginx:1.19.1-alpine

ENV PROJECT_ROOTDIR /var/www/

COPY ./docker/nginx/config/site.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p $PROJECT_ROOTDIR
COPY ./public/ $PROJECT_ROOTDIR
