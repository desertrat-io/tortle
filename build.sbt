name := """tortle"""
organization := "io.desertrat"

version := "1.0-SNAPSHOT"

scalaVersion := "2.13.4"

lazy val root = (project in file(".")).enablePlugins(PlayJava)


libraryDependencies ++= Seq(
  "mysql" % "mysql-connector-java" % "8.0.19",
  guice,
  javaJpa,
  "org.hibernate" % "hibernate-core" % "5.4.30.Final",
  "org.glassfish.jaxb" % "jaxb-core" % "2.3.0.1",
  "org.glassfish.jaxb" % "jaxb-runtime" % "2.3.2",
  "org.mockito" % "mockito-core" % "3.7.7" % "test",
  "org.projectlombok" % "lombok" % "1.18.20"
)


Test / javaOptions += s"-Dconfig.file=conf/application.test.conf"

Test / fork := true

PlayKeys.externalizeResourcesExcludes += baseDirectory.value / "conf" / "META-INF" / "persistence.xml"

