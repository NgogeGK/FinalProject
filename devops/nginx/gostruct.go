package main

import(
"fmt"

)
type Student struct {
	Name string
	Regno string
	Phone string
	Course string
	id int

}

func main() {
	clifford := Student{
		Name: "Clifford Beta",
		Regno: "EN 273-0628/2013",

	}

	fmt.println(clifford)
	clifford.Phone = "0706677565"
	fmt.println(clifford)
	
}
