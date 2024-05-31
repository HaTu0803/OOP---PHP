## Lớp trừu tượng (abstract class)

- Lớp trừu tượng là lớp mà không thể tạo đối tượng từ lớp đó.
- Lớp trừu tượng chứa ít nhất một phương thức trừu tượng.
- Phương thức trừu tượng là phương thức mà không có cài đặt.
- Một lớp kế thừa từ lớp trừu tượng phải cài đặt tất cả các phương thức trừu tượng của lớp cha.

```<?php
abstract class Person{
    protected $firstName;
    protected $lastName;

    public function __construct($firstName,$lastName){
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
    }

    public function __toString(){
        return sprintf("%s, %s",$this->lastName, $this->firstName);
    }

    abstract public function getSalary();
} 
?>

```

```     
<?php
 
class Employee extends Person{
	private $salary;
 
	public function __construct($firstName,$lastName,$salary){
		parent::__construct($firstName, $lastName);
		$this->salary = $salary;
	}
 
	public function getSalary(){
		return $salary;
	}
 
}

 
$e = new Employee('John','Doe',5000);
echo $e;

?>
```