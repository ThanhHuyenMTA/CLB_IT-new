import { Component, OnInit } from '@angular/core';
import { Customer } from './customer';
import { CustomerService } from './customer.service';

@Component({
    selector: 'my-customer-list',
    templateUrl: '../angularjs/app/customer/customer-list.component.html',
    providers: [CustomerService]
})
export class CustomerListComponent {
    customers: Customer[] = [];
    
    constructor(private customerService: CustomerService){}
    
    getCustomers(){
        this.customerService.getCustomers()
        .then(customers => this.customers = customers,
            setTimeout(function () {
                $('#example1').DataTable( {"order": [[ 1, "desc" ]]});
            }, 500));
    }
    
    ngOnInit(){
        this.getCustomers();
    }

}
