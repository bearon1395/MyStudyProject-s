import 'package:flutter/material.dart';
import 'package:flutter_app/screens/homescreen.dart';
import 'package:flutter_app/screens/examplescreen1.dart';

// void main() => runApp(MainScreen());

void main() => runApp(MaterialApp(
  debugShowCheckedModeBanner: false,
  initialRoute: '/',
  routes: {
    '/':(BuildContext context) => MainScreen(),
    '/second': (BuildContext context) => SecondScreen(),
  }, 
  ));

