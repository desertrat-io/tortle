name := """tortle"""
organization := "io.desertrat"

version := "1.0-SNAPSHOT"

lazy val root = (project in file(".")).enablePlugins(PlayJava, PlayEbean)

scalaVersion := "2.13.1"

libraryDependencies ++= Seq(
  "mysql" % "mysql-connector-java" % "8.0.19",
  guice,
  jdbc,
  "io.ebean" % "ebean" % "12.1.13",
  "org.glassfish.jaxb" % "jaxb-core" % "2.3.0.1",
  "org.glassfish.jaxb" % "jaxb-runtime" % "2.3.2"
)

dependencyOverrides ++= Seq(
  "io.ebean" % "ebean" % "12.1.13"
)

playEbeanModels in Compile := Seq("models.*")
playEbeanModels in Test := Seq("models.*")
inConfig(Test)(PlayEbean.scopedSettings)
playEbeanDebugLevel := 4