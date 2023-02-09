
# Section A ՞ MySQL




## Author

- [@oniseun](https://www.github.com/oniseun)


## Create database and tables

First you need to create database  

```bash
  mysql> CREATE DATABASE IF NOT EXISTS oddsscanner; 
  
  mysql> USE oddsscanner;
```

import the tables  

```bash
  mysql> source ./sql_db.sql
```

## Questions

1) Write a query to display the name (first_name and last_name) and department ID of all
employees in departments 30 or 100 in ascending order.

```bash
  mysql> source ./question_1/query.sql
```

2) Write a query to find the manager ID and the salary of the lowest-paid employee for that
manager.

```bash
  mysql> source ./question_2/query.sql
```
  
3) Write a query to find the name (first_name and last_name) and the salary of the employees
who earn more than the employee whose last name is Bell

```bash
  mysql> source ./question_3/query.sql
```

4) Write a query to find the name (first_name and last_name), job, department ID and name of
all employees that work in London.

```bash
  mysql> source ./question_4/query.sql
```

5) Write a query to get the department name and number of employees in the department.

```bash
  mysql> source ./question_5/query.sql
```