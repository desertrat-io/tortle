package repositories.impl;

import models.users.User;
import play.db.jpa.JPAApi;
import repositories.DatabaseExecutionContext;
import repositories.UserRepository;

import javax.inject.Inject;
import javax.inject.Singleton;
import javax.persistence.EntityManager;
import java.util.concurrent.CompletionStage;

import static java.util.concurrent.CompletableFuture.supplyAsync;

@Singleton
public class JPAUserRepository implements UserRepository {

    private final JPAApi jpaApi;
    private final DatabaseExecutionContext databaseExecutionContext;

    @Inject
    public JPAUserRepository(final JPAApi jpaApi, final DatabaseExecutionContext databaseExecutionContext) {
        this.jpaApi = jpaApi;
        this.databaseExecutionContext = databaseExecutionContext;
    }
    @Override
    public CompletionStage<User> byId(final Long id) {
        return null;
    }


    private User insert(final EntityManager em, final User user) {
        em.persist(user);
        return user;
    }
}
