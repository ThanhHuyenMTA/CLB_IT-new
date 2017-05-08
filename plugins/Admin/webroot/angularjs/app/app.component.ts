import { Component } from '@angular/core';
import { CustomerListComponent } from './customer/customer-list.component';

@Component({
    selector: 'my-app',
    template: `
        <my-customer-list>Loading...</my-customer-list>
        `,
    directives: [CustomerListComponent]
})
export class AppComponent { }
