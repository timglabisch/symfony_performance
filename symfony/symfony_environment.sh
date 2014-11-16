export SYMFONY__REDIS_PORT=${REDIS_PORT_6379_TCP_PORT}
export SYMFONY__REDIS_ADDRESS=${REDIS_PORT_6379_TCP_ADDR}

export SYMFONY__database_host=${MYSQL_PORT_3306_TCP_ADDR}
export SYMFONY__database_port=${MYSQL_PORT_3306_TCP_PORT}
export SYMFONY__database_password=root

export SYMFONY__elasticsearch_host=${ELASTICSEARCH_PORT_9200_TCP_ADDR}
export SYMFONY__elasticsearch_port=${ELASTICSEARCH_PORT_9200_TCP_PORT}

export SYMFONY__mongodb_host=${MONGODB_PORT_27017_TCP_ADDR}
export SYMFONY__mongodb_port=${MONGODB_PORT_27017_TCP_PORT}

export SYMFONY__postgres_host=${POSTGRES_PORT_5432_TCP_ADDR}
export SYMFONY__postgres_port=${POSTGRES_PORT_5432_TCP_PORT}

export SYMFONY__kafka_host=${KAFKA_PORT_9092_TCP_ADDR}
export SYMFONY__kafka_port=${KAFKA_PORT_9092_TCP_PORT}

export SYMFONY__silex_host=${SILEX_PORT_5560_TCP_ADDR}
export SYMFONY__silex_port=${SILEX_PORT_5560_TCP_PORT}
