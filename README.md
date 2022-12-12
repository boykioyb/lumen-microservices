# Lumen-microservices
Lumen microservices
![image](https://user-images.githubusercontent.com/19341086/206898877-cca0ed22-b561-4c03-b2b8-908c78adfeb4.png)

#Command check:
## check network
```python
docker network inspect app-network
```
## execute docker
run with bash
```python
docker exec -it my_app bash
```
or run with sh
```python
docker exec -it my_app sh
```
or ping network
```python
docker exec -it my_app ping 127.0.0.1
```
or run command
```python
docker exec -it my_app composer install
```
