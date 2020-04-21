
//---------------------------------------------signup page call------------------------------------------------------
exports.signup = function(req, res){
   message = '';
   if(req.method == "POST"){
      var post  = req.body;
      var name= post.user_name;
      var pass= post.password;
      var fname= post.first_name;
      var lname= post.last_name;
      var mob= post.mob_no;

      var sql = "INSERT INTO `users`(`first_name`,`last_name`,`mob_no`,`user_name`, `password`) VALUES ('" + fname + "','" + lname + "','" + mob + "','" + name + "','" + pass + "')";

      db.query(sql, function(err, result) {

         message = "Succesfully! Your account has been created.";
         res.render('signup.ejs',{message: message});
      });

   } else {
      res.render('signup');
   }
};
 
//-----------------------------------------------login page call------------------------------------------------------
exports.login = function(req, res){
   var message = 'Tài khoản không chính xác';
   if(req.method == "POST"){
      var post  = req.body;
      var name= post.user_name;
      var pass= post.password;
      var sql="SELECT id, first_name, last_name, user_name, mob_no, email FROM users WHERE user_name='"+name+"' and password = '"+pass+"'";
      db.query(sql, function(err, results){      
         if(results.length){
            req.session.userID = results[0].id;
            req.session.user = results[0];
            res.redirect('/home/main');
         }
         else{
            message = 'Tài khoản không chính xác!';
            res.render('index.ejs',{message: message});
         }
                 
      });
   } else {
      res.render('index.ejs',{message: message});
   }
           
};
//-----------------------------------------------dashboard page functionality----------------------------------------------
           
exports.main = function(req, res, next){
           
   var user =  req.session.user,
   userId = req.session.userId;
   /*if(userId == null){
      res.redirect("/login");
      return;
   }*/

   var sql="SELECT * FROM `users` WHERE `id`='"+userId+"'";

   db.query(sql, function(err, results){
      res.render('main.ejs', {user:user});
   });       
};
//------------------------------------logout functionality----------------------------------------------
exports.logout = function(req,res){
   req.session.destroy(function(err) {
      res.redirect("/login");
   })
};
//--------------------------------render user details after login--------------------------------
exports.profile = function(req, res){
   var user =  req.session.user,
       userId = req.session.userId;
   /*if(userId == null){
      res.redirect("/login");
      return;
   }*/

   var sql="SELECT * FROM `users` WHERE `id`='"+userId+"'";

   db.query(sql, function(err, results){
      res.render('profile.ejs', {user:user});
   });
};

//---------------------------------edit users details after login----------------------------------
exports.editprofile=function(req,res){
   var userId = req.session.userId;
   if(userId == null){
      res.redirect("/login");
      return;
   }

   var sql="SELECT * FROM `users` WHERE `id`='"+userId+"'";
   db.query(sql, function(err, results){
      res.render('edit_profile.ejs',{data:results});
   });
};

/*-----------------About---------------------*/
exports.about = function(req, res, next){

    var user =  req.session.user,
        userId = req.session.userId;
    /*if(userId == null){
       res.redirect("/login");
       return;
    }*/

    var sql="SELECT * FROM `users` WHERE `id`='"+userId+"'";

    db.query(sql, function(err, results){
        res.render('about.ejs', {user:user});
    });
};

/*-----------------Service---------------------*/
exports.service = function(req, res, next){

   var user =  req.session.user,
       userId = req.session.userId;
   /*if(userId == null){
      res.redirect("/login");
      return;
   }*/

   var sql="SELECT * FROM `users` WHERE `id`='"+userId+"'";

   db.query(sql, function(err, results){
      res.render('service.ejs', {user:user});
   });
};


/*-----------------Contact---------------------*/
exports.contact = function(req, res, next){

   var user =  req.session.user,
       userId = req.session.userId;
   /*if(userId == null){
      res.redirect("/login");
      return;
   }*/

   var sql="SELECT * FROM `users` WHERE `id`='"+userId+"'";

   db.query(sql, function(err, results){
      res.render('contact.ejs', {data:user});
   });
};


/*-----------------Book---------------------*/
function donvi(num) {
   if(num > 99999){
      var t = JSON.stringify(num);
      var a = t.split('');
      var b = a.splice(0, a.length - 3,' ');
      var c = b.splice(0, b.length - 3,' ');
      var d = c.join('')+b.join('')+a.join('');
      return d;
   }
   else{
      var k = JSON.stringify(num);
      var a = k.split('');
      var b = a.splice(0, a.length - 3, ' ');
      var c = b.join('') + a.join('');
      return c;
   }
}

function date(date) {
   const d = new Date(date)
   const ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
   const mo = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(d);
   const da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);

   return (`${da}/${mo}/${ye}`);
}

exports.book = function(req, res) {
   var user =  req.session.user,
       userId = req.session.userId;
   if(req.method == "POST"){
      var post  = req.body;
      var date1 = post.date1;
      var date2 = post.date2;
      var optstart = post.optstart;
      var optend = post.optend;
      var seats = post.seats;
      var optmoney = post.optmoney;
      var sql="SELECT * FROM car WHERE seats='"+seats+"'";
      db.query(sql, function(err, results){
         if (optmoney == 0){
            var car = results.filter(x => x.unit < 500000 && x.Seats == seats);
         }
         else if(optmoney == 1){
            var car = results.filter(x => x.unit >= 500000 && x.unit < 1000000 && x.Seats == seats);
         }
         else{
            var car = results.filter(x => x.unit >= 1000000 && x.Seats == seats);
         }
         var i = Math.floor(Math.random() * car.length);
         req.session.car = car[i];
         req.session.date1 = date1;
         req.session.date2 = date2;
         req.session.optstart = optstart;
         req.session.optend = optend;
         res.redirect('/home/booking');
      });
   } else {
      res.render('book.ejs',{user:user});
   }

};

exports.booking = function(req, res, next){
   var car = req.session.car;
   var date1update = date(req.session.date1);
   var date1 = req.session.date1;
   var date2update = date(req.session.date2);
   var date2 = req.session.date2;
   var optstart = req.session.optstart;
   var optend = req.session.optend;
   var total = req.session.total;
   var unit = donvi(car.unit);
   var money= req.session.money;
   var user =  req.session.user,
       userId = req.session.userId;
   if (date1 != date2){
      date1 = new Date(date1);
      date2 = new Date(date2);
      const oneDay = 24 * 60 * 60 * 1000;
      var day = (date2.getTime() - date1.getTime())/oneDay;
      total = donvi(car.unit) + ' x ' + day + ' ngày';
      money = ' ' + donvi(car.unit*day) + 'VND'

   }else if ((optend - optstart)/60 <= 5){
      total = donvi(car.unit) + ' x ' + (optend - optstart)/60 + ' giờ';
      money = ' ' + donvi(car.unit*0.5) + 'VND';
   }
   else{
      total = donvi(car.unit) + ' x ' + (optend - optstart)/60 + ' giờ';
      money = ' ' + donvi(car.unit) + ' VND'
   }
   var sql="SELECT * FROM `users` WHERE `id`='"+userId+"'";

   db.query(sql, function(err, results){
      res.render('booking.ejs', {user:user,car,date1update,date2update,total,money,unit,optstart,optend});
   });
};