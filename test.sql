  SELECT
obj_customers.id_customer,
obj_customers.name_customer,
obj_customers.company,
obj_contracts.id_contract,
obj_contracts.number,
obj_contracts.date_sign,
obj_contracts.staff_number,
obj_services.id_service,
obj_services.title_service,
obj_services.`status`
FROM
obj_contracts
INNER JOIN obj_services ON obj_services.id_contract = obj_contracts.id_contract
INNER JOIN obj_customers ON obj_contracts.id_customer = obj_customers.id_customer