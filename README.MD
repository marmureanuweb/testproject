### Start mini project locally
1. Clone repository to local environment url: https://github.com/marmureanuweb/testproject.git
2. Run [composer install -v] to install dependencies
3. Configure [.env] with your database connection
4. Run in current project folder [php bin/console doctrine:migrations:status] to check if database connection is ok
5. Run in current project folder [php bin/console doctrine:migrations:migrate]
6. Run [bin/console doctrine:fixtures:load]
7. Start local webserver 
8. Go to [https://127.0.0.1:9393/invoice/new] to insert multiple invoices
9. Use [https://www.postman.com/] to test the api
- https://127.0.0.1:9393/api/customers
- https://127.0.0.1:9393/api/invoices
- https://127.0.0.1:9393/custom_api/customers


### TODO
- Implement cache redis
- retrieve full path for invoices in custom_api

### Author
Author: Marmueanu Andrei
Email: marmureanuweb@gmail.com
