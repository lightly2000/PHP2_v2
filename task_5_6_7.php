<?php

class A {
  public function foo()
  {
      static $x = 0;
      echo ++$x;
  }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

/* Ключевое слово static, написанное перед присваиванием значения локальной переменной, приводит к следующим эффектам:
1. Присваивание выполняется только один раз, при первом вызове функции
2. Значение помеченной таким образом переменной сохраняется после окончания работы функции
3. При последующих вызовах функции вместо присваивания переменная получает сохраненное ранее значение

Такое использование слова static называется статическая локальная переменная. */




class C {
  public function foo() {
      static $x = 0;
      echo ++$x;
  }
}
class D extends C {
}
$a1 = new C();
$b1 = new D();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();

// Наследование класса (и метода) приводит к тому, что всё-таки создается новый метод





class E {
  public function foo() {
      static $x = 0;
      echo ++$x;
  }
}
class F extends E {
}
$a1 = new E;
$b1 = new F;
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 

// Создание экземпляра класса возможно без "скобок-конструктора"