# Les tests avec Coldbolt

[TOC]

Pour écrire des tests dans Coldbolt il vous suffit de crée une class sur la method qui contient le test, d'y ajouter l'annotation `#[Test]` et c'est tout ! Oui oui il y a que ça a faire :grin:

```php
#[Test]
public function should_be_true(): void
{
    $this->assertTrue(true);
}
```

Vous pouvez spécifier si le test peut échouer avec le parametre `canFail`:

```php
#[Test(canFail: true)]
public function should_be_true(): void
{
    $this->assertTrue(false);
}
```


Vous pouvez aussi définir un message d'erreur customisé avec `error_message`:

```php
#[Test(error_message: "Fail to assert that var is true")]
public function should_be_true(): void
{
    $this->assertTrue(false);
}
```

## Le cycle de vie d'une class de test

Le cycle de vie d'une class de test peut ce décrire comme cela

```
Appel du constructeur
Appel de toutes les fonctions annotées par BeforeAll

Pour chaque test:
	Appel de toutes les fonctions annotées par Before
	Appel de la fonction du Test
	Appel de toutes les fonctions annotées par After

Appel de toutes les fonctions annotées par AfterAll
```

Il peut aussi ce vulgariser sous la forme de ce schema:

![](../assets/tests/lifecycle.png)

## Documentation complète

### Attributs

Les attibuts ce situe dans le namespace ``Coldbolt\Tests\Attributs`` 

#### After

Dans une classe de test vous pouvez prefixer une methode par l'attibut After. Cette methode sera alors executer après chaque test de la class.

#### AfterAll

Dans une classe de test vous pouvez prefixer une methode par l'attibut AfterAll. Cette methode sera alors executer après le premier test de la class.

#### Before

Dans une classe de test vous pouvez prefixer une methode par l'attibut Before. Cette methode sera alors executer avant chaque test de la class.

#### BeforeAll

Dans une classe de test vous pouvez prefixer une methode par l'attibut BeforeAll. Cette methode sera alors executer avant le premier test de la class.

### Testcases

#### CommunTestcase

##### Assertions

* assertTrue(bool $var)

#### ControlerTestcase

##### Generator

* generateQuery

##### Assertions

* assertStatusCode()
