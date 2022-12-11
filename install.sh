composer i --working-dir=./src/api-gateway &&
composer i --working-dir=./src/payment-service &&
composer i --working-dir=./src/post-service &&
composer i --working-dir=./src/product-service &&
composer i --working-dir=./src/user-service

cp ./src/api-gateway/.env.example ./src/api-gateway/.env &&
cp ./src/payment-service/.env.example ./src/payment-service/.env &&
cp ./src/post-service/.env.example ./src/post-service/.env &&
cp ./src/product-service/.env.example ./src/product-service/.env &&
cp ./src/user-service/.env.example ./src/user-service/.env
