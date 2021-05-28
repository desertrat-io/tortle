package repositories;

import akka.actor.ActorSystem;
import lib.annotations.NonInterface;
import play.libs.concurrent.CustomExecutionContext;

import javax.inject.Inject;

@NonInterface
public class DatabaseExecutionContext extends CustomExecutionContext {

    @Inject
    public DatabaseExecutionContext(ActorSystem actorSystem) {
        super(actorSystem, "database.dispatcher");
    }
}
