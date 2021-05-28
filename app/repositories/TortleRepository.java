package repositories;

import play.db.jpa.JPAApi;

import javax.persistence.EntityManager;
import java.util.concurrent.CompletionStage;
import java.util.function.Function;

public interface TortleRepository<M, K> {

    public CompletionStage<M> byId(K id);

    default <T> T wrap(final Function<EntityManager, T> function, final JPAApi jpaApi) {
        return jpaApi.withTransaction(function);
    }
}
