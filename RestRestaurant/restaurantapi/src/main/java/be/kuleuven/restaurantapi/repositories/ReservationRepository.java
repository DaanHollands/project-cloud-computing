package be.kuleuven.restaurantapi.repositories;

import be.kuleuven.restaurantapi.model.Reservation;
import org.springframework.data.jpa.repository.JpaRepository;
import java.time.LocalDateTime;
import java.util.List;
import java.util.Optional;

public interface ReservationRepository extends JpaRepository<Reservation, Long>{
    public Optional<Reservation> findById(Long id);

    public List<Reservation> findByTableId(Long tableId);

    public List<Reservation> findByTableIdAndDateTimeBetween(Long tableId, LocalDateTime startDateTime, LocalDateTime endDateTime);
}
