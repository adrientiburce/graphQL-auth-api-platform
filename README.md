# Api-platform : auth with GraphQL Support 



This repository was created to test the support of the security layer with GraphQL. 

Security annotation on my `Admin` Entity : 

```php
/**
 * @ORM\Entity(repositoryClass="App\Repository\AdminRepository")
 * @ApiResource(
 *     collectionOperations={
 *         "get"={"security"="is_granted('ROLE_USER')"},
 *         "post"={"security"="is_granted('ROLE_ADMIN')"}
 *     },
 *     itemOperations={
 *         "get"={"security"="is_granted('ROLE_USER')"},
 *         "put"={"security"="is_granted('ROLE_ADMIN') or object.owner == user"},
 *     }
 * )
 */
class Admin implements UserInterface
{
...
```

#### Issue : security annotation only works with REST. 

