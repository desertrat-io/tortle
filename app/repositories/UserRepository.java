package repositories;

import com.google.inject.ImplementedBy;
import models.users.User;
import repositories.impl.JPAUserRepository;

@ImplementedBy(JPAUserRepository.class)
public interface UserRepository extends TortleRepository<User, Long> {


}
