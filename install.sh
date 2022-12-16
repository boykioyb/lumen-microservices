docker exec -u root -it user-service chown -R nobody:nobody .
docker exec -u root -it user-service chmod -R 777 storage/ public/

docker exec -u root -it notify-service chown -R nobody:nobody .
docker exec -u root -it notify-service chmod -R 777 storage/ public/

# docker exec -u root -it payment-service chown -R nobody:nobody .
# docker exec -u root -it payment-service chmod -R 777 storage/ public/

docker exec -u root -it post-service chown -R nobody:nobody .
docker exec -u root -it post-service chmod -R 777 storage/ public/

docker exec -u root -it product-service chown -R nobody:nobody .
docker exec -u root -it product-service chmod -R 777 storage/ public/
