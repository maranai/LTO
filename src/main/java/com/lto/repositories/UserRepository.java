package com.lto.repositories;

import com.lto.model.User;
import org.springframework.data.jpa.repository.JpaRepository;

/**
 * @author <a href="https://github.com/jarias">jarias</a>
 */
public interface UserRepository extends JpaRepository<User, Long> {
    User findByUsername(String username);
}
