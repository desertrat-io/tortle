name := """tortle"""
organization := "io.desertrat"

version := "1.0-SNAPSHOT"

lazy val root = (project in file(".")).enablePlugins(PlayJava, PlayEbean)

scalaVersion := "2.13.1"

libraryDependencies ++= Seq(
  "mysql" % "mysql-connector-java" % "8.0.19",
  guice,
  jdbc,
  evolutions
)

playEbeanModels in Compile := Seq("models.*")
playEbeanDebugLevel := 4