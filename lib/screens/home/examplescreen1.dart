import 'package:flutter/material.dart';
import 'dart:math';

class MainScreen extends StatefulWidget {
  @override
  State<MainScreen> createState() => _BackgroundSwitcher();
}

class _BackgroundSwitcher extends State<MainScreen> {
  final rng = new Random();
  int bgcolor = 0xFF000000; //first color for background

  @override
  Widget build(BuildContext context) {
    return Directionality(
      textDirection: TextDirection.ltr,
      child: GestureDetector(
        onTap: () {
          setState(() {
            bgcolor = 0xFF000000 +
                rng.nextInt(0xFFFFFF); //set random color for background
          });
        },
        child: Container(
          color: Color(bgcolor),
          child: Center(
            child: Text(
              'Hey there',
              style: TextStyle(
                color: Color(0xFFFD620A),
                fontSize: 32.0,
              ),
            ),
          ),
        ),
      ),
    );
  }
}