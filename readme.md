This is just a simple CRUD operations in calendar which shows lists of people that was born that day. 

This project also using **Flat File Database** which use a single text file (.txt) as database. The database-text-file is located inside `public/storage/` folder. The file name is taken accordingly to their respective date.

This also use SPA concept or all server requests is handled using powerful javascript library called **axios**. 


#### Framework & Library That Used in this Project is :

- **Laravel** - for fantastic PHP Framework
- **Vue.js** - for awesome Javascript Framework
- **axios** - for powerful Javascript Async HTTP Request
- **Bulma** - for great UI and components
- **Buefy** - for very nice combining vuejs and bulma for more ease of use

Many thanks for all the framework and library in above.


#### Installation

1. Download this repo, or clone it `git clone https://github.com/baadillahnabil/calendar.git`
2. move to inside project folder `cd calendar`
3. install all node modules using this command `npm install` or `yarn`
4. install all composer modules using this command `composer install`
5. rename `.env.example` to `.env` and run this command `php artisan key:generate`
6. run `npm run dev` or `yarn run dev`
7. **IMPORTANT!** run this projects in browser using your own local server like XAMPP or WAMPP. using command `php artisan serve` somehow not correct when using axios.



#### License

The project is open-sourced and licensed under the [MIT license](http://opensource.org/licenses/MIT). 
Which means you can use it guys :) Cheers.
