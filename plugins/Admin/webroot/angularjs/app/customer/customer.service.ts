import { Injectable } from '@angular/core';
import { Customer } from './customer';
import { Headers, Http } from '@angular/http';
import { Customers } from './mock-customers';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/toPromise';

@Injectable()
export class CustomerService{
    private customerUrl = '/api/customer/quan-ly.html';
    
    constructor(private http: Http){
    }
    
    getCustomers() {
       return this.http.get(this.customerUrl)
               .toPromise()
               .then(response => response.json() as Customer[])
               .catch(this.handleError);
    }
    
    private handleError(error: any) {
        console.error('An error occurred', error);
        return Promise.reject(error.message || error);
    }
}